# Generated by Django 2.2.6 on 2020-02-15 00:53

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('realtors', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='realtor',
            name='photo',
            field=models.ImageField(upload_to='photo/%Y/%m/%d/'),
        ),
    ]
