import os, sys
if __name__ == '__main__':
    sys.path.append(os.getcwd())
    os.environ.setdefault("DJANGO_SETTINGS_MODULE", "main.settings")
    import django
    django.setup()




