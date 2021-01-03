from django.db import models
import string
import random

# Create your models here.
def generate_unique_id():
    while True:
        id = ''.join(random.choices(string.ascii_letters, k = 6)) ##length = 8
        if Question.objects.filter(question_id =id).exists() :
            break

    return id


class Question(models.Model):
    question_id =  models.CharField(max_length=8, default = generate_unique_id, unique = True)
    name = models.CharField(max_length=50)
    level = models.IntegerField(null=False, default = 1)
    creation_time = models.DateTimeField(auto_now_add = True)


    def __str__(self):
        return self.name