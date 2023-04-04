import React, { useEffect, useState } from 'react';
import { BASEURL } from '../contants';
import { Http } from '../Http.ts';

function EmployeeList(){

  const [list, setList] = useState([]);

  useEffect( () => {

    Http.get(`${BASEURL}attendence`).then(res => {
      if(res.data) setList( res.data.data ) 
    })

  }, [] )
  
  
  return (
    <div className="App">
      <table striped bordered hover className='Emp-Table'>
        <thead>
          <tr>
            <th>Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Working Hours</th>
          </tr>
        </thead>
        <tbody>
          { list.map( i => (<tr>
            <td>{ i.emp_name }</td>
            <td>{ i.checkin_at || 'N/A' }</td>
            <td>{ i.checkout_at || 'N/A' }</td>
            <td>{ i.worked_hrs }</td>
          </tr>) )}
        </tbody>
        {/* <tfoot>
          <tr>
            <td></td>
            <td colSpan={2} className="text-right">Total Working Hours</td>
            <td>{ list.reduce( (a,b) => (a + (b.worked_hrs || 0) ), 0 ) }</td>
          </tr>
        </tfoot> */}
      </table>
    </div>
  );
}

export default EmployeeList;