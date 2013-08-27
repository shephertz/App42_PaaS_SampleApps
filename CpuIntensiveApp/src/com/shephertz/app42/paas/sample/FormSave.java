package com.shephertz.app42.paas.sample;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


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
		
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		double cpuUsage = new CpuThread().getCpuLoad();
		out.print("<!doctype html><html><head><meta charset='utf-8'><title>App42 CPU-Intensive App</title><body><h2>CPU Usage: <b>"+cpuUsage+"</b> %</h2></body></html>");
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 * 
	 *      This functions saves the data into user table
	 */
	protected void doPost(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {

		new Thread(new CpuThread()).start();
		new Thread(new CpuThread()).start();
		new Thread(new CpuThread()).start();
		new Thread(new CpuThread()).start();
		
		
	}

}
