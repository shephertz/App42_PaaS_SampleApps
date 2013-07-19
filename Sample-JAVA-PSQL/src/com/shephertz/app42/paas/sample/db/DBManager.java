package com.shephertz.app42.paas.sample.db;

import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.datasource.DriverManagerDataSource;
import com.shephertz.app42.paas.sample.util.Util;

public class DBManager {

	private DriverManagerDataSource dataSource = null;

	public DBManager() {
		try {
			System.out.println("I M HERE");
			dataSource = new DriverManagerDataSource();
			dataSource.setDriverClassName("org.postgresql.Driver");
			String dbUrl = Util.getDBUrl();
			String username = Util.getDBUser();
			String password = Util.getDBPassword();
			String dbName = Util.getDBName();
			int port = Util.getDBPort();
			System.out.println("DBURL: " + dbUrl + " UserName: " + username
					+ " Password: " + password + " Port: " + port + " DBName: "
					+ dbName);
			dataSource.setUrl("jdbc:postgresql://" + dbUrl + ":" + port + "/"
					+ dbName + "?autoReconnect=true");
			dataSource.setUsername(username);
			dataSource.setPassword(password);
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	private static final DBManager dsManager = new DBManager();

	public static DBManager getInstance() {
		return dsManager;
	}

	public DriverManagerDataSource getDataSource() {
		return dataSource;
	}

	/**
	 * @param query
	 * @return
	 * @throws SQLException
	 */
	public ArrayList<Map<String, Object>> select(String sqlQuery)
			throws Exception {
		JdbcTemplate db = null;
		try {
			db = new JdbcTemplate(DBManager.getInstance().getDataSource());
		} catch (Exception e) {
			throw e;
		}

		ArrayList<Map<String, Object>> resultList = new ArrayList<Map<String, Object>>();
		try {
			List<Map<String, Object>> result = db.queryForList(sqlQuery);
			for (int i = 0; i < result.size(); i++) {
				Map<String, Object> rowMap = result.get(i);
				resultList.add(rowMap);
			}
		} catch (Exception e) {
			throw new Exception("Error executing query: " + sqlQuery);
		}
		return resultList;

	}

	/**
	 * @param query
	 * @return
	 * @throws Exception 
	 */
	public void insertForAffectedRows(String query) throws Exception {
		JdbcTemplate db = new JdbcTemplate(DBManager.getInstance()
				.getDataSource());
		String sqlQuery = query;
		try {
			db.update(sqlQuery);
		} catch (Exception e) {
			throw new Exception("Error executing query: " + sqlQuery);
		}
	}

}
