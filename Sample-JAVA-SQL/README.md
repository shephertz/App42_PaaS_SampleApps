Getting Started with Java-MySql Sample Application:
----------------------------------------------------

This application is basically a simple User Input Form that takes input from user and saves it in database.

Configuration:
-------------

In order to configure this application following steps are to be done:

1. Open Config.properties (located in WebContent folder).

2. Update the details of your service in it.

         app42.paas.db.username = <your_database_username>
         app42.paas.db.port = <your_service_port>
         app42.paas.db.password = <your_database_password>
         app42.paas.db.ip = <your_service_ip>
         app42.paas.db.name = <your_database_name>

3. Export the application as war and deploy the binary on App42PaaS.
        
         $ app42 deploy
         $ Enter App Name: <your_app_name>
         $ Would you like to deploy from the current directory? [Yn]: n
         $ Binary Deployment Path: <your_binary_path>
         $ This process may take a while, be patient with it.
         $ Deploying Application... OK
         $ Please wait it may take few minutes.
         $ Latest Status....|
         $ App deployed successfully.




