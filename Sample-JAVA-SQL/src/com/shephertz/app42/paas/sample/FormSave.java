package com.shephertz.app42.paas.sample;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.shephertz.app42.paas.sample.db.DBManager;

/**
 * Servlet implementation class FormSave This class saves the data into database
 */
public class FormSave extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public FormSave() {
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
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 * 
	 *      This functions saves the data into user table
	 */
	protected void doPost(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		// get request parameters
		String username = request.getParameter("username");
		String email = request.getParameter("email");
		String description = request.getParameter("description");

		try {
			// insert query
			String query = "INSERT INTO user(username,description,email) VALUES('"
					+ username + "', '" + description + "', '" + email + "')";
			System.out.println("Query: " + query);
			// Database Manager called
			DBManager db = new DBManager();
			db.insert(query);
		} catch (Exception ex) {
			ex.printStackTrace();
		}

		// Redirect to new url
		String newUrl = "http://" + request.getServerName() + ":"
				+ request.getServerPort() + request.getContextPath() + "/home";
		response.setStatus(response.SC_MOVED_PERMANENTLY);
		response.setHeader("Location", newUrl);

	}

}
