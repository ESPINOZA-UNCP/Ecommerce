from django import forms
from django.core import validators
from django.contrib.auth.forms import UserCreationForm
from .models import*

class RegisterForm(UserCreationForm):
    class Meta:
        model = Usuario
        fields = ['email', 'name', 'lastname','password1', 'password2']
        widgets = {
            'name': forms.TextInput(
                attrs={
                    'class': 'form-control',
                    'placeholder': 'Nombres',
                    }
            ),
            'lastname': forms.TextInput(
                attrs={
                    'class': 'form-control',
                    'placeholder': 'Apellidos',
                }
            ),    
            'email': forms.EmailInput(
                attrs={
                    'class': 'form-control',
                    'placeholder': 'Correo electrónico',
                }
            ),
        }

class UpdateForm(forms.ModelForm):
    class Meta:
        model = Usuario
        fields = ['email', 'name', 'lastname']
        # widgets = {
        #     'imagen': forms.FileInput(
                
        #     )
        # }

class LoginForm(forms.Form):
    username = forms.CharField(max_length=20, required=True)
    password = forms.CharField(widget=forms.PasswordInput, required=True)
    
