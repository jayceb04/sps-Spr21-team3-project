package com.google.sps.servlets;

import com.google.cloud.datastore.Datastore;
import com.google.cloud.datastore.DatastoreOptions;
import com.google.cloud.datastore.Entity;
import com.google.cloud.datastore.FullEntity;
import com.google.cloud.datastore.KeyFactory;
import com.google.cloud.datastore.Value;

import java.io.IOException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.jsoup.Jsoup;
import org.jsoup.safety.Whitelist;

/*servlet to store data of students*/
@WebServlet("/data")
public class FormServlet extends HttpServlet {

    @Override
  public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException{
       // Sanitize user input to remove HTML tags and JavaScript.
    String college = Jsoup.clean(request.getParameter("college"), Whitelist.none());
    String graduationDate = Jsoup.clean(request.getParameter("graduationDate"), Whitelist.none());
    String major = Jsoup.clean(request.getParameter("major"), Whitelist.none());
  
 Datastore datastore = DatastoreOptions.getDefaultInstance().getService();
    KeyFactory keyFactory = datastore.newKeyFactory().setKind("Data");
    FullEntity dataEntity =
        Entity.newBuilder(keyFactory.newKey())
            .set("college", college)
            .set("graduationDate", graduationDate)
            .set("major", major)
            .build();
    datastore.put(dataEntity);
     System.out.println("College: " + college + "\n" + "Graduation Date: " + graduationDate
    + "\n" + "Major:" + major );
    response.sendRedirect("/tree-landing.html");
  }
}
