from django.contrib import admin
from django.contrib.auth.models import Group
from .models import Question

# Register your models here.
class QuestionAdmin(admin.ModelAdmin):
    fields = ['name', 'level']

admin.site.site_header = "Admin Dashboard"
admin.site.unregister(Group)
admin.site.register(Question,QuestionAdmin)

