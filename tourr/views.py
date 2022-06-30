from django.shortcuts import redirect, render
from django.contrib.auth import authenticate, login, logout
from django.contrib import messages
from tourr.form import RegisterForm, UpdateForm
from validate_email import validate_email
from django.contrib.auth import get_user_model
from .models import *

# Create your views here.

def myaccount(request):
    return render(request,'atrapalo/myaccount.html',{
        'consulta':'view',
    })

def index(request):
    
    return render(request, 'index.html',{
        'title': 'TE DAMOS LA BIENVENIDA AL SERVICIO DE TOURS',
        'content': 'Bienvenido al servicio de tours, aqui podras encontrar todos los tours que tenemos para ti',
    })

def about_view(request):
    return render(request, 'about.html',{
        'title': 'About',
    })

def login_view(request):
    if request.user.is_authenticated:
        return redirect('/inicio')
    else:
        old_email=""
        if request.method == 'POST':
            old_email=""
            email = request.POST.get('email')
            password = request.POST.get('password')
            old_email = email
            email_valid = validate_email(email_address=email,
            check_format=True)
            if email_valid == False:
                err_email = "Ingrese un Email valido"
            else:
                err_email = ""

            user = authenticate(request,email=email, password=password)
            if user is not None:
                login(request, user)
                user_name= request.user.name
                messages.success(request, f'Bienvenido {user_name} ', extra_tags='alert alert-success')
                return redirect('/inicio')
            else:
                User = get_user_model()
                if User.objects.filter(email=email).exists():
                    error_user = "Contraseña Incorrecta"
                else:
                    error_user = "El email no existe"
                messages.error(request, 'Credenciales incorrectas', extra_tags='alert alert-danger')
                return render(request, 'login.html',{'old_email':old_email,'email_error':err_email, 'error_user':error_user})  
        return render(request, 'login.html',{
            'title': 'Login',
        })

def logout_view(request):
    logout(request)
    return redirect('/inicio')

def register_view(request):
    if request.user.is_authenticated:
        return redirect('/inicio')
    else:
        register_form = RegisterForm(request.POST)

        if request.method == 'POST':
            register_form = RegisterForm(request.POST)

            if register_form.is_valid():
                register_form.save()
                username = register_form.cleaned_data['name']
                messages.success(request, f'Usuario {username} creado con éxito', extra_tags='alert alert-success')
                return redirect('/login')
        return render(request , 'register.html',{
            'title': 'Registro',
            'register_form': register_form,
            'consulta':'register'
        })

def edit_view(request,id):
    if request.user.is_authenticated and request.user.id == id:
        user= Usuario.objects.get(id=id)
        if request.method == 'GET':
            update_form = UpdateForm(instance=user)
        else:
            update_form = UpdateForm(request.POST, instace=user)
            if update_form.is_valid():
                update_form.save()
                messages.success(request, f'Usuario "{request.user.name}" actualizado con exito', extra_tags='alert alert-success')
                return redirect('/myaccount/')
            else:
                messages.error(request, 'Error al actualizar', extra_tags='alert alert-danger')
        return render(request, 'atrapalo/myaccount.html', {
            'update_form':update_form,
            'consulta':'edit'
        })