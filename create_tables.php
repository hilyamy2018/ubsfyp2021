
<?php
# AttributeType: S->String, N->Numerical(Int)
# AttributeName: attributes
# KeySchema -> defining table primary key/composite key
# KeyType -> Hash -> primary key, RANGE -> secondary key
# Only mention the key and secondary key in attributes since it is NoSQL DB, so number of attributes must match number of keys
# GameID consists of a combination of the gametype(battle, challenge, training, test->to determine the start level), gamechapter(sql, xss, brute force, etc), gamelevel
    date_default_timezone_set('Asia/Singapore');
    
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    
    require 'vendor/autoload.php';
    use Aws\DynamoDb\DynamoDbClient;
    
    $client = DynamoDbClient::factory(array(
        'region' => 'ap-southeast-1',
        'version' => 'latest'
    ));
    
    $tableNames = array();
    
    $tableName = 'User';
    echo "Creating table $tableName. " . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'UserName',
                'AttributeType' => 'S' 
            ),
            array(
                'AttributeName' => 'UserEmail',
                'AttributeType' => 'S' 
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'UserName',
                'KeyType' => 'HASH' 
            ),
            array(
                'AttributeName' => 'UserEmail',
                'KeyType' => 'RANGE' 
            )
        ),
        'ProvisionedThroughput' => array(
             'ReadCapacityUnits'  => 6,
             'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;
    
    $tableName = 'Game';
    echo "Creating table $tableName. " . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'GameId',
                'AttributeType' => 'S' 
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'GameId',
                'KeyType' => 'HASH'
            )
        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits'  => 6,
            'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;

    $tableName = 'UserGameRelationship';
    echo "Creating table $tableName. " . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'UserName',
                'AttributeType' => 'S' 
            ),
            array(
                'AttributeName' => 'GameId',
                'AttributeType' => 'S' 
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'UserName',
                'KeyType' => 'HASH' 
            ),
            array(
                'AttributeName' => 'GameId',
                'KeyType' => 'RANGE'
            )
        ),
        'ProvisionedThroughput' => array(
             'ReadCapacityUnits'  => 6,
             'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;

    foreach($tableNames as $tableName) {
        echo "Creating $tableName. " . PHP_EOL;
        $client->waitUntil('TableExists', array('TableName' => $tableName));
        echo "$tableName created successfully. " . PHP_EOL;
    }
?>