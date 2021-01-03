
from django.urls import path
from .views import QuestionView

urlpatterns = [
   path('home', QuestionView.as_view()),
]