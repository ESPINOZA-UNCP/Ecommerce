from django.contrib.auth.admin import UserAdmin as BaseUserAdmin
from django.contrib import admin
from .models import *

# Register your models here.
admin.site.register(Usuario)
# class UserAdmin(BaseUserAdmin):
#     ordering = ['email']
#     list_display=['name','lastname','email','usuario_administrador']


# admin.site.register(Usuario,UserAdmin)