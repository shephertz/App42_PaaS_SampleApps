Getting Started with Java Sample Application:
----------------------------------------------------

This is a simple Java-Web application that has a jsp file. This application Welcomes you to App42PaaS.

<b>[Download the source code from git.](https://github.com/shephertz/App42_PaaS_SampleApps/archive/master.zip)</b>

Note: This project is build with java 6.

STS/Eclipse Configuration:
---------------------------

In order to configure this application following steps are to be done:

         1. Import the project in STS/Eclipse.

         2. Right click on the Project and go to properties.

         3. Under java build path, Configure your Tomcat and Java path.
		 
Note: For Eclipse, you have to enable Java Web applications (download the addon).


Project Configuration:
------------------------

In order to change the message , Edit index.jsp file (located in WebContent folder).


Building the project:
----------------------

			1. Right click on the project and click export.
         
			2. Under web, select WAR file.
         
			3. Enter the destination path and click on the finish button. Your war is ready.
        
					$ app42 deploy
					$ Enter App Name: <your_app_name>
					$ Would you like to deploy from the current directory? [Yn]: n
					$ Binary Deployment Path: <your_binary_path>
					$ This process may take a while, be patient with it.
					$ Deploying Application... OK
					$ Please wait it may take few minutes.
					$ Latest Status....|
					$ App deployed successfully.




