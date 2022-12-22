package ws.jpa.entities;

import java.io.Serializable;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
@Entity
@NamedQueries({
@NamedQuery(name="Customer.findAll",query="select c from Customer c"), @NamedQuery(name="Customer.findByCity",
query="select c from Customer c where c.address like :city")

})
public class Customer implements Serializable{
@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
private long id;
private String fullName;
private String address;
private String phone;
public Customer() {
}
public Customer(String fullName, String address, String phone)
{ this.fullName = fullName;
this.address = address;
this.phone = phone;
}
public String getFullName() {
return fullName;
}
public void setFullName(String fullName)
{ this.fullName = fullName;
}
public String getAddress() {
return address;
}
public void setAddress(String address) {


this.address = address;
}
public String getPhone() {
return phone;
}
public void setPhone(String phone) {
this.phone = phone;
}
public long getId() {
return id;
}
@Override
public int hashCode() {
final int prime = 31;
int result = 1;
result = prime * result + (int) (id ^ (id >>>
32)); return result;
}
@Override
public boolean equals(Object obj) {
if (this == obj)
return true;
if (obj == null)
return false;
if (getClass() != obj.getClass())
return false;
Customer other = (Customer) obj;
if (id != other.id)
return false;
return true;
}
@Override
public String toString() {
return "Customer [id=" + id + ", fullName=" + fullName + ", address=" + address + ", phone=" + phone + "]";
}
}
