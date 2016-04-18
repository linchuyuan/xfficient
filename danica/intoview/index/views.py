# Create your views here.
# Create your views here.
from django.http import HttpResponse, Http404
from django import template
from django.template import loader
from django.shortcuts import *
import hashlib
import time
import source


def page_open(request):
	request.session['linchuyuan']="linchun";
	t = loader.get_template('index.html');
	c = template.Context({'dummy':request.session['linchuyuan']});
	return HttpResponse(t.render(c))

def login_validation(request):
	if request.method == 'POST':
		username = request.POST["username"];
		password = request.POST["password"];
		db_password = source.get_data('admin','password','username',str(username));
		if password == db_password:
			sessionId = request.session._get_or_create_session_key();
			request.session['token']= 1;
			request.session.modified = True
			return HttpResponseRedirect('main.html/'+hashlib.md5(username).hexdigest());
		else:
			request.session.flush();
			return HttpResponse('wrong login information');
	else:
		raise Http404;

def main(request,dummy = None):
	if request.session.get('token'):
		return HttpResponse('logged in');
	else:
		request.session.flush();
		raise Http404;



