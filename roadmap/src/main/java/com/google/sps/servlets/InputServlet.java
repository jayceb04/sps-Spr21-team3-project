package com.google.sps.servlets;

import java.io.IOException;

import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.google.cloud.datastore.Datastore;
import com.google.cloud.datastore.DatastoreOptions;
import com.google.cloud.datastore.Entity;
import com.google.cloud.datastore.FullEntity;
import com.google.cloud.datastore.KeyFactory;
import com.google.cloud.datastore.Query;
import com.google.cloud.datastore.QueryResults;
import com.google.cloud.datastore.StructuredQuery.OrderBy;

@WebServlet("/question-data")
public class InputServlet extends HttpServlet {

	private static final long serialVersionUID = 1L;

@Override
  public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws IOException {
              response.setContentType("text/html;");

    Datastore datastore = DatastoreOptions.getDefaultInstance().getService();

    Query<Entity> query = Query.newEntityQueryBuilder()
      .setKind("Message")
      .setOrderBy(OrderBy.desc("timestamp"))
      .build();
    QueryResults<Entity> results = datastore.run(query);

    while (results.hasNext()) {
      Entity entity = results.next();
      String message = entity.getString("text");      
      response.getWriter().println(message);
      break;
    }
  }
  
  @Override
  public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {

    String text = request.getParameter("message");
     
    Datastore datastore = DatastoreOptions.getDefaultInstance().getService();
    KeyFactory keyFactory = datastore.newKeyFactory().setKind("Message");
    FullEntity messageEntity = Entity.newBuilder(keyFactory.newKey())
      .set("text", text)
      .set("timestamp", System.currentTimeMillis())
      .build();
    datastore.put(messageEntity);
    response.sendRedirect("/question-data");
  }
}
