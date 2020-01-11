from django.contrib import admin
from django.urls import path, include
from . import views
from rest_framework import routers
from .views import ProductViewSet, SuppliersViewSet, OrderDetailsViewSet, \
    CategoriesViewSet
from rest_framework.authtoken.views import obtain_auth_token

router = routers.DefaultRouter()
router.register('products', ProductViewSet)
router.register('suppliers', SuppliersViewSet)
router.register('order_details', OrderDetailsViewSet)
router.register('categories', CategoriesViewSet)

app_name = "api"

urlpatterns = [
    path('', include(router.urls)),
]