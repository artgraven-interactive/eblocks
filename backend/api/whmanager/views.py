from django.shortcuts import render
from .models import Products, Suppliers, OrderDetails, Categories
from rest_framework import viewsets
from rest_framework.authentication import TokenAuthentication, SessionAuthentication
from rest_framework.permissions import IsAuthenticated, AllowAny
from rest_framework.response import Response
from .serializer import ProductsSerializer, SuppliersSerializer, OrderDetailsSerializer, CategoriesSerializer

# Create your views here.
class ProductViewSet(viewsets.ModelViewSet):
    serializer_class = ProductsSerializer
    queryset = Products.objects.all()
    authentication_classes = (TokenAuthentication, SessionAuthentication)
    permission_classes = (IsAuthenticated,)

    # TODO: we must override all default methods to insure no leaks also to
    # to allow clowns to request access to addresses

    # TODO: function for clowns to request access and troupe leaders to approve

class SuppliersViewSet(viewsets.ModelViewSet):
    serializer_class = SuppliersSerializer
    queryset = Suppliers.objects.all()
    authentication_classes = (TokenAuthentication, SessionAuthentication)
    permission_classes = (IsAuthenticated,)

    # TODO: we must override all default methods to insure no leaks also to
    # to allow clowns to request access to addresses

    # TODO: function for clowns to request access and troupe leaders to approve

class OrderDetailsViewSet(viewsets.ModelViewSet):
    serializer_class = OrderDetailsSerializer
    queryset = OrderDetails.objects.all()
    authentication_classes = (TokenAuthentication, SessionAuthentication)
    permission_classes = (IsAuthenticated,)

    # TODO: we must override all default methods to insure no leaks also to
    # to allow clowns to request access to addresses

    # TODO: function for clowns to request access and troupe leaders to approve

class CategoriesViewSet(viewsets.ModelViewSet):
    serializer_class = CategoriesSerializer
    queryset = Categories.objects.all()
    authentication_classes = (TokenAuthentication, SessionAuthentication)
    permission_classes = (IsAuthenticated,)

    # TODO: we must override all default methods to insure no leaks also to
    # to allow clowns to request access to addresses

    # TODO: function for clowns to request access and troupe leaders to approve
