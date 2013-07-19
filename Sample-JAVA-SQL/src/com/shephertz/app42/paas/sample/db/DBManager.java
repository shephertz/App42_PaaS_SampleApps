package com.shephertz.app42.paas.sample.db;

import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.PreparedStatementCreator;
import org.springframework.jdbc.datasource.DriverManagerDataSource;
import org.springframework.jdbc.support.GeneratedKeyHolder;
import org.springframework.jdbc.support.KeyHolder;

import com.shephertz.app42.paas.sample.util.Util;

public class DBManager {

	private DriverManagerDataSource dataSource = null;

	public DBManager() {
		try {
			System.out.println("I M HERE");
			dataSource = new DriverManagerDataSource();
			dataSource.setDriverClassName("com.mysql.jdbc.Driver");
			// dataSource.setDriverClassName("org.postgresql.Driver");
			String dbUrl = Util.getDBUrl();
			String username = Util.getDBUser();
			String password = Util.getDBPassword();
			String dbName = Util.getDBName();
			int port = Util.getDBPort();
			System.out.println("DBURL: " + dbUrl + " UserName: " + username
					+ " Password: " + password + " Port: " + port + " DBName: "
					+ dbName);
			dataSource.setUrl("jdbc:mysql://" + dbUrl + ":" + port + "/"
					+ dbName + "?autoReconnect=true");
			// dataSource.setUrl("jdbc:postgresql://" + dbUrl + ":" + port + "/"
			// + dbName + "?autoReconnect=true");
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
			throws SQLException {
		JdbcTemplate db = null;
		try {
			db = new JdbcTemplate(DBManager.getInstance().getDataSource());
		} catch (Exception e) {
			throw new SQLException(e.getStackTrace().toString());
		}

		ArrayList<Map<String, Object>> resultList = new ArrayList<Map<String, Object>>();
		try {
			List<Map<String, Object>> result = db.queryForList(sqlQuery);
			for (int i = 0; i < result.size(); i++) {
				Map<String, Object> rowMap = result.get(i);
				resultList.add(rowMap);
			}
		} catch (Exception e) {
			throw new SQLException("Error executing query: " + sqlQuery);
		}
		return resultList;

	}

	/**
	 * @param query
	 * @return
	 */
	public int insertForAffectedRows(String query) {
		JdbcTemplate db = new JdbcTemplate(DBManager.getInstance()
				.getDataSource());
		String sqlQuery = query;
		int insertId = db.update(sqlQuery);
		return insertId;
	}

	public void execute(String query) throws SQLException {
		JdbcTemplate db = new JdbcTemplate(DBManager.getInstance()
				.getDataSource());
		try {
			db.execute(query);
		} catch (Exception e) {
			throw new SQLException("Error executing query " + query);
		}
	}

	/**
	 * @param query
	 * @return
	 * @throws SQLException
	 */
	public void insertForId(final String query) {
		JdbcTemplate db = new JdbcTemplate(DBManager.getInstance()
				.getDataSource());

		KeyHolder keyHolder = new GeneratedKeyHolder();
		db.update(new PreparedStatementCreator() {
			@Override
			public java.sql.PreparedStatement createPreparedStatement(
					java.sql.Connection connection) throws SQLException {
				PreparedStatement ps = (PreparedStatement) connection
						.prepareStatement(query, new String[] { "id" });
				// ps.setString(1, name);
				return ps;
			}
		}, keyHolder);

	}

}
