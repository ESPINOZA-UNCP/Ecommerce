# Generated by Django 4.0.5 on 2022-07-07 05:09

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('tourr', '0006_viajes_imagen'),
    ]

    operations = [
        migrations.AlterField(
            model_name='viajes',
            name='imagen',
            field=models.ImageField(default=1, upload_to='viajes'),
            preserve_default=False,
        ),
    ]
