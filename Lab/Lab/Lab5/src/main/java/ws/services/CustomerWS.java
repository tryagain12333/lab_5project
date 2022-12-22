package ws.services;

import java.util.List;
import javax.ejb.Stateless;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import javax.persistence.EntityManager; 
import javax.persistence.PersistenceContext;
import ws.jpa.entities.Customer;
//missing will generate error about transaction 
@Stateless
@WebService()
public class CustomerWS {
@PersistenceContext(unitName="TeoPU")
private EntityManager em;
public CustomerWS() {
}
@WebMethod
@SuppressWarnings("unchecked")
public List<Customer>getAll(){
return em.createNamedQuery("Customer.findAll").getResultList();
}
@WebMethod()
public void Insert(@WebParam(name="cust")Customer

c){ em.persist(c);

}
//====Add your wishes methods here
}
