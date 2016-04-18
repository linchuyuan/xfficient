from django.conf.urls import patterns, include, url
from django.http import HttpResponse
from django.contrib.staticfiles.urls import *
from django.views.decorators.csrf import csrf_exempt
from index import views

# Uncomment the next two lines to enable the admin:
# from django.contrib import admin
# admin.autodiscover()

urlpatterns = patterns('',
			url(r'^main.html/(?P<dummy>\w+)/$', views.main),
			url(r'^ukk716$', views.login_validation),
			url(r'^robots.txt$', lambda r: HttpResponse("User-agent: *\nDisallow: /", mimetype="text/plain")),
			url(r'^tango/$', views.page_open),
			url(r'^lofo/$', views.page_open),
			url(r'^$',views.page_open))+ static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT);

urlpatterns += staticfiles_urlpatterns()

    # url(r'^$', 'intoview.views.home', name='home'),
    # url(r'^intoview/', include('intoview.foo.urls')),

    # Uncomment the admin/doc line below to enable admin documentation:
    #  url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    # url(r'^admin/', include(admin.site.urls)),

