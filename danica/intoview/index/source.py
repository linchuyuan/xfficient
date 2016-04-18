import MySQLdb

source = MySQLdb.connect(host="localhost",user="root",passwd="linchuyuan",db="intoview");

cur=source.cursor();

def string_processor(data): #string_process for get_data
	word = "";
	data = str(data);
	for index in range(3,len(data)-1):
		word = word + data[index];
		if data[index+1] == '\'':
			break;
	return word;

def print_table(target): #print table from target
	message = "";
	cur.execute("SELECT * FROM "+target);

	for row in cur.fetchall():
		message = message + str(row);

	source.close;
	return message;

def insert_admin(target,user,key,gender,email): #insert to primary table
	cur.execute("INSERT INTO " + target + " (username,password,gender,email) VALUE (\"" +user+ "\",\""+key+"\",\""+gender+"\",\""+email+"\")");
        source.close;
        return ;

def insert_table(target,hori_array,hori_value): #insert to primary table
	magic = "INSERT INTO " + target + " ("
	for index in range(0,len(hori_array)):
		if index == len(hori_array)-1:
			magic = magic + hori_array[index];
		else:
			magic = magic + hori_array[index]+", ";
	magic = magic + ") VALUE (\"" ;
	
	for index in range(0,len(hori_value)):
		if index == len(hori_value)-1:
			magic = magic + hori_value[index] + "\")";
		else:
			magic = magic + hori_value[index] + "\" , \"" ;
        cur.execute(magic)
        source.close;
        return ;

def get_data(target,target_data,anchor_name,anchor = None): #read from select table
	if not anchor:
		raise "anchor required";
		
	else:
		cur.execute("SELECT "+target_data+" FROM "+target+" WHERE "+anchor_name+" = \'"+anchor+"\'");
		data = cur.fetchall();
		data = string_processor(data);
	source.close;
	return data;

def create_table(target,attribute_array): #create table referenced by admin table
	magic = "CREATE TABLE "+target+" (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
	for index in range(0,len(attribute_array)):
		if index == len(attribute_array)-1:
			magic = magic + attribute_array[index];
		else:
			magic = magic + attribute_array[index]+ ", ";
	magic = magic + ")";
	#print magic;
	cur.execute(magic);
	return;

	
