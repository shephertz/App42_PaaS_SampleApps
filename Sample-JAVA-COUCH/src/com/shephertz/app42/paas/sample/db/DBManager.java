package com.shephertz.app42.paas.sample.db;

import java.util.ArrayList;
import java.util.List;

import com.fourspaces.couchdb.Database;
import com.fourspaces.couchdb.Document;
import com.fourspaces.couchdb.Session;
import com.fourspaces.couchdb.ViewResults;
import com.shephertz.app42.paas.sample.util.Util;

public class DBManager {

	private Session session = null;
	private Database db = null;

	public DBManager(){
		String dbIp = Util.getDBIp();
		int port = Util.getDBPort();
		String dbName = Util.getDBName();
		String dbUser = Util.getDBUser();
		String password = Util.getDBPassword();
		session = new  Session(dbIp, port, dbUser, password);
		//boolean auth = db.authenticate(dbUser, password.toCharArray());
		try {
			db = session.getDatabase(dbName);
		}catch(Exception e){
			db = session.createDatabase(dbName);
		}
	}

	public List<String> select() {
		ViewResults couchViewResults = db.getAllDocuments();
		List<Document> result = couchViewResults.getResults();
		List<String> resultRows = new ArrayList<String>();
		for(Document doc : result){
			resultRows.add(db.getDocument(doc.getString("id")).toString());
		}
		return resultRows;
	}
	
	public void insert(String name, String description, String email){
		Document doc = new Document();
		doc.put("name", name);
		doc.put("email", email);
		doc.put("description", description);
		
		db.saveDocument(doc);
		
	}
	
	public void delete(){
		db = session.getDatabase(Util.getDBName().toString());
		session.deleteDatabase(db);
	}
	

}
