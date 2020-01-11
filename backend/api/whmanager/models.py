from django.db import models

# Create your models here.
class Suppliers(models.Model):
    """ORM class for Suppliers model.

    This is important
    """

    class Meta:
        """Metadata for the Suppliers model."""
        ordering = ('created_at',)
        db_table = 'suppliers'

    SupplierID = models.AutoField(primary_key=True)
    CompanyName = models.CharField(max_length=191, blank=True, null=True)
    ContactName = models.CharField(max_length=191, blank=True, null=True)
    ContactTitle = models.CharField(max_length=191, blank=True, null=True)
    Address = models.TextField(
        help_text='Please provide address',
        blank=True)
    City = models.CharField(max_length=191, blank=True, null=True)
    Region = models.CharField(max_length=191, blank=True, null=True)
    PostalCode =models.CharField(max_length=191, blank=True, null=True)
    Country = models.CharField(max_length=191, blank=True, null=True)
    Phone = models.CharField(max_length=11, blank=True, null=True)
    Fax = models.CharField(max_length=191, blank=True, null=True)
    HomePage = models.CharField(max_length=191, blank=True, null=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __repr__(self):
        """String representation for our model instance."""
        return f'{self.CompanyName} (ID: {self.SupplierID})'

class Categories(models.Model):
    """ORM class for Categories model.

    This is important
    """

    class Meta:
        """Metadata for the Categories model."""
        ordering = ('created_at',)
        db_table = 'categories'

    CategoryID = models.AutoField(primary_key=True)
    CategoryName = models.CharField(max_length=191, blank=True, null=True)
    Description = models.TextField(
        help_text='Please provide a description of this category',
        blank=True)
    Picture = models.ImageField()


    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __repr__(self):
        """String representation for our model instance."""
        return f'{self.CategoryName} (ID: {self.CategoryID})'

class Products(models.Model):
    """ORM class for Products model.

    This is important
    """

    class Meta:
        """Metadata for the Products model."""
        ordering = ('created_at',)
        db_table = 'products'

    ProductID = models.AutoField(primary_key=True)
    ProductName = models.CharField(max_length=191, blank=True, null=True)
    SupplierID = models.ForeignKey(Suppliers, default=1,
                               on_delete=models.CASCADE, related_name='supplier_id')
    CategoryID = models.ManyToManyField(Categories,
                                         related_name='categories',
                                         blank=True)
    QuantityPerUnit = models.PositiveIntegerField(null=True, blank=True)
    UnitPrice = models.PositiveIntegerField(null=True, blank=True)
    UnitsInStock = models.PositiveIntegerField(null=True, blank=True)
    UnitisOnOrder = models.PositiveIntegerField(null=True, blank=True)
    ReorderLevel = models.IntegerField(null=True, blank=True)
    Discontinued = models.NullBooleanField(null=True, blank=True)

    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __repr__(self):
        """String representation for our model instance."""
        return f'{self.ProductName} (ID: {self.ProductID})'

class OrderDetails(models.Model):
    """ORM class for OrderDetails model.

    This is important
    """

    class Meta:
        """Metadata for the Order Details model."""
        ordering = ('created_at',)
        db_table = 'order_details'

    OrderID = models.AutoField(primary_key=True)
    ProductID =models.ForeignKey(Products, default=1,
                               on_delete=models.CASCADE, related_name='product_id')
    UnitPrice = models.CharField(max_length=191, blank=False, null=False)
    Quanity = models.CharField(max_length=191, blank=False, null=False)
    Discount = models.CharField(max_length=191, blank=True, null=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __repr__(self):
        """String representation for our model instance."""
        return f'{self.ProductID} (ID: {self.OrderID})'