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

	static MongoClient mongoClient = null;
	static DB db = null;

	static {
		String dbUrl = Util.getDBUrl();
		int port = Util.getDBPort();
		String dbName = Util.getDBName();
		String dbUser = Util.getDBUser();
		String password = Util.getDBPassword();
		try {
			mongoClient = new MongoClient(dbUrl, port);
			// boolean auth = db.authenticate(dbUser, password.toCharArray());
			db = mongoClient.getDB(dbName);
		} catch (UnknownHostException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	public static void insert(String user, String email, String description) {
		try {
			// boolean auth = db.authenticate(dbUser, password.toCharArray());
			DBCollection table = db.getCollection("user");
			BasicDBObject newDocument = new BasicDBObject();
			newDocument.put("username", user);
			newDocument.put("email", email);
			newDocument.put("description", description);

			table.insert(newDocument);

		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	public static ArrayList<DBObject> select() {
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
	
	public static void delete() {
		System.out.println("---------------------------DBM-------------");
		DBCollection table = db.getCollection("user");
		table.drop();
	}

}
