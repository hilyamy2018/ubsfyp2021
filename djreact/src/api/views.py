from django.shortcuts import render
# from django.http import HttpResponse
from rest_framework import generics, status
from .models import Question
from .serializers import QuestionSerializer
from rest_framework.views import APIView
from rest_framework.response import Response

# Create your views here.
## e.g. /hello, /main, end point for a url

class QuestionView(generics.ListAPIView): #CreateAPIView - to post
    queryset = Question.objects.all()
    serializer_class = QuestionSerializer



