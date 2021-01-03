### help to turn the content of a model into json format
from rest_framework import serializers
from .models import Question

class QuestionSerializer(serializers.ModelSerializer):
    class Meta:
        model = Question
        # fields = ('id', 'question_id', 'name', 'level','creation_time')
        fields = '__all__'


