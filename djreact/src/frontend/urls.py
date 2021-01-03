
from django.urls import path
from .views import index

urlpatterns = [
    
    path('', index),
    path('selectgame', index)
    # path('api-auth/', include('rest_framework.urls')),
    # path('', TemplateView.as_view(template_name='index.html')),
]