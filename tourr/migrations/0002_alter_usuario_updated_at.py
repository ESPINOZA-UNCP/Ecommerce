# Generated by Django 4.0.4 on 2022-06-22 01:50

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('tourr', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='usuario',
            name='updated_at',
            field=models.DateTimeField(blank=True, null=True),
        ),
    ]
