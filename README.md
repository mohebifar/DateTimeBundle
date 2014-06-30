DateTimeBundle is a Symfony2 bundle which helps you to show Datetimes based on a calendar and provides a DatePicker (Choice and jQuery DatePicker) Form type. CalendarBundle uses a strategy that allows you to make your arbitary calendar driver.

Currently drivers are :

 1. Gregorian
 2. Persian (also known as Hejri Khorshidi, Hijri Shamsi (Persian: هجری شمسی, هجری خورشیدی). It is official calendar in Iran)

Installation
============
You can install this bundle using composer :

    require: {
        ...,
		"mohebifar/date-time-bundle": "dev-master"
	}
	
Then update :

    composer update

Also you can install it using git :

    git clone https://github.com/mohebifar/DateTimeBundle.git

After getting package, you have to include that. Edit `app/AppKernel.php` and add this line in `registerBundles` function :

    $bundles[] = new Mohebifar\CalendarBundle\DateTimeBundle();

Configuration
=============

Edit *app/config/config.yml* as following :

    mohebifar_date_time:
        ...
        calendar: Persian
        
And now your calendar service uses persian driver.

Use
===

You can access calendar service in controller :

    class TestController extends Controller
    {

        public function indexAction()
        {
            $datetime = $this->get("mohebifar.datetime");
            $datetime->format('j F Y'); // Format date time as a string
            $datetime->makeTime(0, 12, 30, 4, 9, 1393); // Make a \DateTime instance
            ...
        }
        
    }

Formats
-------

    $calendar->date("Y/n/j");

Persian Result : `1392/8/15`
Gregorian Result : `2013/11/6`

    $calendar->date("l jS F Y H:i:s");

Persian Result : `چهارشنبه پانزدهم آبان 1392 11:20:00` 
Gregorian Resilt: `Wednsday 16th November 2013 11:20:00`


Timezone
-------
You can set Timezones by one of the following methods :

1. Set timezone as default :

        date_default_timezone_set("Asia/Tehran");
        

2. Set it on DateTime object :

        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('Pacific/Nauru'));
        
        // Then pass this $date stuff to $object->format('Y/m/d', $date);

Twig Extension
=======
Twig filter is available for this bundle. If you want to print out some timestamp or DateTime object, you can use `date_filter` in twig. for example :

    <span class="date">{{ post.date|date_format('Y-m-d H:i:s') }}</span>
    
DatePicker Form Type
=======

This Bundle provides you a DatePicker FormType with your Calendar Driver. The FormType has 2 types of widgets : `choice` and `jquery`

Choice Widget
-------
Set `widget` option `'widget' => 'choice'`.

        $builder
            ->add('date', 'mohebifar_datetime', array('widget' => 'choice'));

jQuery Widget
-------
The jQuery DatePicker uses [Keith Wood jQuery Datepicker](http://keith-wood.name/datepick.html) plugin.

First of all you must add the bundle in Assetic. Edit *app/config/config.yml* :

    assetic:
        ...
        bundles:        [ 'MohebifarDateTimeBundle' ]

Set `widget` option `'widget' => 'jquery'`.

        $builder
            ->add('date', 'mohebifar_datetime', array('widget' => 'jquery'));

Add this in `<head>` block :

    {{ form_datetime_css(form) }}
    
Then add this right after the line jQuery is included :
     {{ form_datetime_js_asset(form) }}
     {{ form_datetime_js(form) }}