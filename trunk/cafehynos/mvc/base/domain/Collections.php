<?php
namespace MVC\Domain;

interface AppCollection 			extends \Iterator {function add( Object $App );}
interface CategoryCollection 		extends \Iterator {function add( Object $category );	}
interface CollectGeneralCollection 	extends \Iterator {function add( Object $CollectGeneral );}
interface ConfigCollection 			extends \Iterator {function add( Object $Config );}
interface CourseCollection 			extends \Iterator {function add( Object $Course );	}
interface CourseLogCollection 		extends \Iterator {function add( Object $CourseLog );	}
interface CustomerCollection 		extends \Iterator {function add( Object $Customer );}
interface DomainCollection 			extends \Iterator {function add( Object $Domain );}
interface EmployeeCollection 		extends \Iterator {function add( Object $Employee );}
interface GuestCollection 			extends \Iterator {function add( Object $Guest);}
interface PaidGeneralCollection 	extends \Iterator {function add( Object $PaidGeneral );}
interface PaidEmployeeCollection 	extends \Iterator {function add( Object $PaidEmployee );}
interface PayRollCollection 		extends \Iterator {function add( Object $PayRoll );}
interface SupplierCollection 		extends \Iterator {function add( Object $Supplier );	}
interface SessionCollection 		extends \Iterator {function add( Object $Session );	}
interface SessionDetailCollection 	extends \Iterator {function add( Object $SessionDetail );	}
interface OrderImportCollection 	extends \Iterator {function add( Object $OrderImport );	}
interface OrderImportDetailCollection 	extends \Iterator {function add( Object $OrderImportDetail );	}
interface TableCollection 			extends \Iterator {function add( Object $table );}
interface TableLogCollection 		extends \Iterator {function add( Object $TableLog );}
interface TermCollectCollection 	extends \Iterator {function add( Object $TermCollect );}
interface TermPaidCollection 		extends \Iterator {function add( Object $TermPaid );}
interface TrackingCollection 		extends \Iterator {function add( Object $Tracking);}
interface TrackingDailyCollection 	extends \Iterator {function add( Object $TrackingDaily);}
interface TrackingCourseCollection 	extends \Iterator {function add( Object $TrackingCourse);}
interface TrackingStoreCollection 	extends \Iterator {function add( Object $TrackingStore);}
interface TrackingCustomerCollection extends \Iterator {function add( Object $TrackingCustomer);}
interface ResourceCollection 		extends \Iterator {function add( Object $Resource);}
interface UnitCollection 			extends \Iterator {function add( Object $Unit );}
interface UserCollection 			extends \Iterator {function add( Object $user );}
interface PageCollection 			extends \Iterator {function add( Object $Page);}
interface R2CCollection 			extends \Iterator {function add( Object $R2C);}
interface PrinterCollection 		extends \Iterator {function add( Object $Printer);}
?>