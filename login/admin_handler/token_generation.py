# # to get a string like this run:
# # openssl rand -hex 32
import jwt
import uuid
number = 3
result = {}


for i in range(number):
    SECRET_KEY = str(uuid.uuid4())
    encoded_jwt = jwt.encode({"some": "payload"}, SECRET_KEY, algorithm="HS256")
    result[i+1] = encoded_jwt


for key, value in result.items():
    print(key, ' : ', value)