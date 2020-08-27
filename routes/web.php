 <?php



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home','HomeController@index')->name('home');

//Employee Routes Are here------------
Route::get('/add-employee','EmployeeController@index')->name('add.employee');
Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee','EmployeeController@Employees')->name('all.employee');
Route::get('/view-employee/{id}','EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}','EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}','EmployeeController@EditEmployee');
Route::post('/update-employee/{id}','EmployeeController@UpdateEmployee');


//Customers Routes are here-----------
Route::get('/add-customer','CustomerController@index')->name('add.customer');
Route::post('/insert-customer','CustomerController@store');
Route::get('/all-customer','CustomerController@AllCustomer')->name('all.customer');
Route::get('/view-customer/{id}','CustomerController@ViewCustomer');
Route::get('/delete-customer/{id}','CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}','CustomerController@EditCustomer');
Route::post('/update-customer/{id}','CustomerController@UpdateCustomer');


//Suppliers Route Here
Route::get('/add-supplier','SupplierController@index')->name('add.supplier');
Route::post('/insert-supplier','SupplierController@store');
Route::get('/all-supplier','SupplierController@AllSupplier')->name('all.supplier');
Route::get('/view-supplier/{id}','SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}','SupplierController@DeleteSupplier');
Route::get('/edit-supplier/{id}','SupplierController@EditSupplier');
Route::post('/update-supplier/{id}','SupplierController@UpdateSupplier');


//Salary routes are start from here........
Route::get('/add-advanced-salary','SalaryController@AddAdvancedSalary')->name('add.advancedsalary');
Route::post('/insert-advancedsalary','SalaryController@InsertAdvanced');
Route::get('/all-advanced-salary','SalaryController@AllSalary')->name('all.advancedsalary');

Route::get('/pay-salary','SalaryController@PaySalary')->name('pay.salary');


//Category Routes Starts from here........
Route::get('/add-category','SalaryController@AddCategory')->name('add.category');
Route::post('/insert-category','SalaryController@InsertCategory');
Route::get('/all-category','SalaryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}','SalaryController@DeleteCategory');
Route::get('/edit-category/{id}','SalaryController@EditCategory');
Route::post('/update-category/{id}','SalaryController@UpdateCategory');

//products Routes are here......
Route::get('/add-product','ProductController@AddProduct')->name('add.product');
Route::post('/insert-product','ProductController@InsertProduct');
Route::get('/all-product','ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}','ProductController@DeleteProduct');
Route::get('/view-product/{id}','ProductController@ViewProduct');
Route::get('/edit-product/{id}','ProductController@EditProduct');
Route::post('/update-product/{id}','ProductController@UpdateProduct');

//excel import and export
Route::get('/import-product','ProductController@ImportProduct')->name('import.product');
Route::get('/export','ProductController@export')->name('export');
Route::post('/import','ProductController@import')->name('import');


//Expense Route are here...........
Route::get('/add-expense','ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense','ExpenseController@InsertExpense');
Route::get('/today-expense','ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}','ExpenseController@EditTodayExpense');
Route::post('/update-expense/{id}','ExpenseController@UpdateExpense');
Route::get('/monthly-expense','ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense','ExpenseController@YearlyExpense')->name('yearly.expense');

//Monthly More Expenses
Route::get('/january-expense','ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense','ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense','ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense','ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense','ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense','ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense','ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense','ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense','ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense','ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense','ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense','ExpenseController@DecemberExpense')->name('december.expense');


//Atendances Routes are here.........
Route::get('/take-attendance','AttendanceController@TakeAttendance')->name('take.attendance');
Route::post('/insert-attendance','AttendanceController@InsertAttendance');
Route::get('/all-attendance','AttendanceController@AllAttendance')->name('all.attendance');
Route::get('/edit-attendance/{edit_date}','AttendanceController@EditAttendance');
Route::post('/update-attendance','AttendanceController@UpdateAttendance');
Route::get('/view-attendance/{edit_date}','AttendanceController@ViewAttendance');

//setting routes are here
Route::get('/website-setting','AttendanceController@Setting')->name('setting');
Route::post('/update-website/{id}','AttendanceController@UpdateWebsite');

//pos routes are here
Route::get('/pos','PosController@index')->name('pos');
Route::get('/pending/order','PosController@PendingOrder')->name('pending.orders');
Route::get('view-order-status/{id}','PosController@ViewOrder');
Route::get('pos-done/{id}','PosController@PosDONE');
Route::get('/success/order','PosController@SuccessOrder')->name('success.orders');
//Cart controller
Route::get('/add-cart','CartController@index');
Route::get('/cart-update/{rowId}','CartController@CartUpdate');
Route::get('/cart-remove/{rowId}','CartController@CartRemove');
Route::post('/create-invoice/','CartController@CreateInvoice');
Route::post('/final-invoice/','CartController@FinalInvoice');