from datetime import datetime
from django.db import models
from django.core.validators import MaxValueValidator
from django.contrib.auth.models import AbstractBaseUser,BaseUserManager,PermissionsMixin

# Create your models here.

class UsuarioManager(BaseUserManager):
    def create_user(self, email, name, password=None):
        if not email:
            raise ValueError('El usuario debe tener un email')

        usuario = self.model(
            email = self.normalize_email(email), 
            name = name, 
        )

        usuario.set_password(password)
        usuario.save()
        return usuario

    def create_superuser(self, email, name , password):
        usuario = self.create_user(
            email,          
            name = name, 
            password = password,
        )
        usuario.usuario_administrador = True
        usuario.save()
        return usuario

class Usuario(AbstractBaseUser):
    id = models.AutoField(primary_key=True)
    name = models.CharField('Nombres', max_length=100, blank=True, null=True)
    lastname = models.CharField('Apellidos', max_length=100, blank=True, null=True)
    email = models.EmailField('Correo Electrónico',max_length=100, unique=True)
    phone = models.PositiveIntegerField('Telefono Movil',validators=[MaxValueValidator(999999999)], blank=True, null=True)
    email_verified_at = models.DateTimeField(auto_now_add=True)
    created_at =models.DateTimeField(default=datetime.now)
    updated_at =models.DateTimeField(blank=True, null=True)
    is_active = models.BooleanField('Activo', default=True)
    usuario_administrador = models.BooleanField('Administrador', default=False)
    objects = UsuarioManager()

    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = ['name']
    
    class Meta:
        verbose_name = 'Usuario'
        verbose_name_plural = 'Usuarios'
        ordering = ['name']

    def __str__(self):
        return f'{self.name}, {self.lastname}'
    
    def has_perm(self, perm, obj=None):
        return True

    def has_module_perms(self, app_label):
        return True

    @property
    def is_staff(self):
        return self.usuario_administrador

class PersonalAccessTokens(models.Model):
    id = models.BigAutoField(primary_key=True)
    tokenable_type = models.CharField(max_length=255)
    tokenable_id = models.PositiveBigIntegerField()
    name = models.CharField(max_length=255)
    token = models.CharField(unique=True, max_length=64)
    abilities = models.TextField(blank=True, null=True)
    last_used_at = models.DateTimeField(blank=True, null=True)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = True
        db_table = 'personal_access_tokens'

class PasswordResets(models.Model):
    email = models.CharField(max_length=255)
    token = models.CharField(max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = True
        db_table = 'password_resets'

class Migrations(models.Model):
    migration = models.CharField(max_length=255)
    batch = models.IntegerField()

    class Meta:
        managed = True
        db_table = 'migrations'

class FailedJobs(models.Model):
    id = models.BigAutoField(primary_key=True)
    uuid = models.CharField(unique=True, max_length=255)
    connection = models.TextField()
    queue = models.TextField()
    payload = models.TextField()
    exception = models.TextField()
    failed_at = models.DateTimeField()

    class Meta:
        managed = True
        db_table = 'failed_jobs'

class Viajes(models.Model):
    id = models.AutoField(primary_key=True)
    nombre = models.CharField(max_length=255)
    descripcion = models.TextField()
    costo = models.PositiveIntegerField()
    imagen = models.ImageField(upload_to='viajes', blank=False, null=False)

    def __str__(self):
        return self.nombre

    class Meta:
        managed = True
        db_table = 'viajes'

class Lugarturistico(models.Model):
    id_lugar = models.AutoField(primary_key=True)
    nombre = models.CharField(max_length=255)
    descripcion = models.TextField()
    costo = models.PositiveIntegerField()
    imagen = models.ImageField(upload_to='viajes', blank=False, null=False)
    deleted_at = models.DateTimeField(blank=True, null=True)

    def __str__(self):
        return self.nombre

    class Meta:
        managed = True
        db_table = 'lugarturistico'