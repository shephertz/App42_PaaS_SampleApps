package com.shephertz.app42.paas.sample;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.shephertz.app42.paas.sample.db.DBManager;

/**
 * Servlet implementation class FormSave
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
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		// TODO Auto-generated method stub
		System.out.println("--------------DELETE CALLED---------------");
		DBManager.delete();
		String newUrl = "http://" + req.getServerName() + ":"
				+ req.getServerPort() + req.getContextPath() + "/Home";

		resp.setStatus(resp.SC_MOVED_PERMANENTLY);
		resp.setHeader("Location", newUrl);
		// super.doDelete(req, resp);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		String username = request.getParameter("username");
		String email = request.getParameter("email");
		String description = request.getParameter("description");

		try {
			DBManager.insert(username, email, description);
		} catch (Exception ex) {
			ex.printStackTrace();
		}

		String newUrl = "http://" + request.getServerName() + ":"
				+ request.getServerPort() + request.getContextPath() + "/Home";

		response.setStatus(response.SC_MOVED_PERMANENTLY);
		response.setHeader("Location", newUrl);

	}

}
