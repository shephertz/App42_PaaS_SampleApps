package com.shephertz.app42.paas.sample.db;

import java.net.UnknownHostException;
import java.util.ArrayList;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.shephertz.app42.paas.sample.util.Util;

public class DBManager {

	MongoClient mongoClient = null;
	DB db = null;

	public DBManager() throws Exception {
		String dbIp = Util.getDBIp();
		int port = Util.getDBPort();
		String dbName = Util.getDBName();
		String dbUser = Util.getDBUser();
		String password = Util.getDBPassword();
		System.out.println(password+" "+dbUser+" "+dbIp+" "+port+" "+password);
		try {
			mongoClient = new MongoClient(dbIp, port);
			db = mongoClient.getDB(dbName);
			boolean auth = db.authenticate(dbUser, password.toCharArray());
			if (!auth) {
				System.out.println("Authentication Failed");
				throw new Exception("Authentication Failed");
			}
		} catch (UnknownHostException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	public void insert(String name, String email, String description) {
		try {
			// boolean auth = db.authenticate(dbUser, password.toCharArray());
			DBCollection table = db.getCollection("user");
			BasicDBObject newDocument = new BasicDBObject();
			newDocument.put("name", name);
			newDocument.put("email", email);
			newDocument.put("description", description);

			table.insert(newDocument);

		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	public ArrayList<DBObject> select() {
		DBCollection table = db.getCollection("user");
		DBCursor dbCursor = table.find();
		ArrayList<DBObject> dbObjectsArray = new ArrayList<DBObject>();
		while (dbCursor.hasNext()) {
			DBObject dbO = dbCursor.next();
			dbObjectsArray.add(dbO);
		}
		System.out.println(dbObjectsArray);
		return dbObjectsArray;
	}

	public void delete() {
		System.out.println("---------------------------DBM-------------");
		DBCollection table = db.getCollection("user");
		table.drop();
	}

}
