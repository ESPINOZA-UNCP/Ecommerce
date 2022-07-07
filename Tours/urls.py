from django.conf import settings
from django.contrib import admin
from django.urls import path
from django.conf.urls.static import static
from tourr import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.index, name='index'),
    path('inicio/', views.index, name='index'),
    path('logout/', views.logout_view, name='logout'),
    path('login/', views.login_view, name='login'),
    path('registro/', views.register_view, name='register'),
    path('about/',views.about_view, name = 'about'),
    path('myaccount/',views.myaccount, name = 'myaccount'),
    path('myaccount/change/personal/',views.edit_view, name ='edit'),
    path('myaccount/change/password/',views.change_password, name = 'change_password'),
    path('alojapuntos/',views.puntos_view, name ='aloja_puntos'),
    path('suscripcion/',views.suscripcion_view, name = 'suscripcion'),
    path('tarjetas/',views.tarjetas_view, name = 'tarjetas'),
    path('contact/',views.contact_view, name = 'contact'),
    path('blog/',views.blog_view, name = 'blog'),
    path('offers/',views.offers_view, name = 'offers'),


]
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
