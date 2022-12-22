package ws.jpa.facades;

import java.util.List;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;
import javax.persistence.EntityManager; 
import javax.persistence.PersistenceContext; 
import javax.persistence.PersistenceContextType;
import ws.jpa.entities.Customer;
@Stateless
@LocalBean
public class CustomerController {
@PersistenceContext(unitName="TeoPU",type=PersistenceContextType.TRANSACTION
)
private EntityManager em;
public CustomerController() {
}
public void Insert(Customer c){
em.persist(c);
}
public void Remove(Customer c){
em.remove(em.merge(c));;
}
public void Update(Customer c){
em.merge(c);
}
@SuppressWarnings("unchecked")
public List<Customer>getAll(){
return em.createNamedQuery("Customer.findAll").getResultList();
}
@SuppressWarnings("unchecked")
public List<Customer>getByCity(String city){
return em.createNamedQuery("Customer.findByCity").

setParameter("city", "%"+city+"%").getResultList();
}
}
