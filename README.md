# EmployeeManagement
Object Oriented PHP 
*This is a simple project on php with object oriented style created by following principles of SOFTWARE ENGINEERING

This defines our problem statement:

*All the crude operations of employee
*for a single company
*Salary assigned to user as per his designation
*As this is a basic Project there will be only dashboard on the user side and a small feature to decided holidays only for the managers

To do:
*calculate the monthly salary of the  employee
*predict the salary of the person according to his current attendance weekly monthly yearly(SPECIAL FEATURE)
*TDS will be deducted from the salary

What is TDS ??

TDS stands for tax deducted at source. As per the Income Tax Act, any company or person making a payment is required to deduct tax at source if the payment exceeds certain threshold limits. TDS has to be deducted at the rates prescribed by the tax department.
The company or person that makes the payment after deducting TDS is called a deductor and the company or person receiving the payment is called the deductee. It is the deductor’s responsibility to deduct TDS before making the payment and deposit the same with the government. TDS is deducted irrespective of the mode of payment–cash, cheque or credit–and is linked to the PAN of the deductor and deductee.
TDS is deducted on the following types of payments:
Salaries
Interest payments by banks
Commission payments
Rent payments
Consultation fees
Professional fees
RULES FOR TDS

TDS=0% Up to Rs.3,00,000
TDS=5% Rs.2,50,001-Rs.5,00,000
TDS=10% Rs.5,00,001-Rs.10,00,000
TDS=30% Above Rs.10,00,000






 
/********************************************************************************************************/






















/***************************************** TABLE DETAILS ************************************/

Employee
*emp_id
*emp_first_name
*emp_last_name
*emp_email
*emp_address
*emp_phone
*emp_gender
*emp_role_id
*emp_photo
*emp_age
*emp_qualification
*emp_dob








Role
*role_id                                
*role_name
*role_basic_pay
*role_salary
*role_house_allowance
*role_family_allowance


Holidays 
Holiday_id
Date 
Event_name
(This will be required to calculate the attendance of the employee to give him salary)




Login table

*login_id
*emp_id
*login_time(insert current_time on login)/**/
*logout_time(insert current_timr on logout)



Monthly_recieved_salary
*emp_id
*date (day will tell on which day he received salary and month will tell the salary month)
*salary(in rs)

/*Panel to show manager the calendar on which he can marks the holidays (we will suggest the him holidays by searching some kind of api)
*https://holidayapi.com/
*/


https://developers.google.com/calendar/v3/reference/calendarList/list#auth


Employee Management-
	-assets
		-css
		-js
		-vendors
			-bootstrap
			-jquery
		-images
			-users
	-classes
-includes
-all php files		


