from django.contrib import admin
from .models import Products, Suppliers, OrderDetails, Categories

# Register your models here.
@admin.register(Products)
class ProductsAdmin(admin.ModelAdmin):
    fields = []
    list_display = ['ProductName', 'Discontinued']
    list_filter = ['ProductName', 'SupplierID', 'CategoryID']
    search_fields = ['ProductName', 'SupplierID', 'CategoryID']

@admin.register(Suppliers)
class SuppliersAdmin(admin.ModelAdmin):
    fields = []
    list_display = ['CompanyName', 'City']
    list_filter = ['CompanyName', 'ContactName', 'City']
    search_fields = ['CompanyName', 'ContactName', 'City']

@admin.register(OrderDetails)
class OrderDetailsAdmin(admin.ModelAdmin):
    fields = []
    list_display = ['OrderID', 'UnitPrice']
    list_filter = ['OrderID', 'UnitPrice', 'updated_at']
    search_fields = ['OrderID', 'UnitPrice', 'updated_at']

@admin.register(Categories)
class CategoriesAdmin(admin.ModelAdmin):
    fields = []
    list_display = ['CategoryName']
    list_filter = ['CategoryName']
    search_fields = ['CategoryName']