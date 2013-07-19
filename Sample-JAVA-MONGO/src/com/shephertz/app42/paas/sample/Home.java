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

import com.mongodb.DBObject;
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
		ArrayList<DBObject> result = null;
		try {
			result = DBManager.select();
		} catch (Exception ex) {
			ex.printStackTrace();
		}

		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		out.print("<html><title>App42-Java-Mongo-Sample </title><body>");
		if (result.size() != 0) {
			out.print("<table border='1'><tr><td><b>Id</b></td><td><b>Result</b></td></tr>");
			for (int i = 0; i < result.size(); i++) {
				out.print("<tr><td>" + i + "</td><td>" + result.get(i)
						+ "</td></tr>");
			}
			out.print("</table>");
			out.print("<div align=\"left\"><form action=\"save\" method=\"get\"><input type=\"submit\" value=\"Clear Data\" /></form></div>");
			
		} else if (result.size() == 0) {
			out.print("<h1>No data</h1><br/><br/>");
		}
		out.print("<a href='/'>Create Post</a>");
		out.print("</body></html>");
	}

	@Override
	protected void doPut(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		System.out.println("DELETE CALLED");
		super.doPut(req, resp);
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
