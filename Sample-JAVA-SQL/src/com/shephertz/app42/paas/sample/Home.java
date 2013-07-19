package com.shephertz.app42.paas.sample;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.shephertz.app42.paas.sample.db.DBManager;

/**
 * Servlet implementation class Log
 */
public class Home extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public Home() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		ArrayList<Map<String, Object>> result = null;
		try {
			String query = "select * from user";
			System.out.println("Query: " + query);
			DBManager db = new DBManager();
			result = db.select(query);
		} catch (SQLException e) {
			e.printStackTrace();
		} catch (Exception ex) {
			ex.printStackTrace();
		}

		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		out.print("<html><title>App42-Java-Sql-Sample </title><body>");
		if (result.size() != 0) {
			out.print("<table border='1'><tr><td><b>Username</b></td><td><b>Email</b></td><td><b>Description</b></td></tr>");
			for (int i = 0; i < result.size(); i++) {
				Map<String, Object> appData = result.get(i);
				out.print("<tr><td>" + appData.get("username") + "</td><td>"
						+ appData.get("email") + "</td><td>"
						+ appData.get("description") + "</td></tr>");
			}
			out.print("</table><br/><br/>");
		} else {
			out.print("<h1>No data</h1><br/><br/>");
		}
		out.print("<a href='/'>Create Post</a>");
		out.print("</body></html>");
	}

	public void save(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub\

	}

}
