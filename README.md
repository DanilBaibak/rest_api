<h1><strong>Micro framework</strong>&nbsp;that helps you create lightweight RESTful API</h1>

<h2><strong>Purpose</strong></h2>

<p>The idea is designed lightweight framework for RESTful API.&nbsp;Classes are loaded according to the&nbsp;<a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md" target="_blank">PSR-4&nbsp;Autoloading Standard</a>. In the framework were implemented flexible routing according to main rules of the <a href="http://en.wikipedia.org/wiki/Representational_state_transfer" target="_blank">RESTful pattern</a>&nbsp;and&nbsp;wrapper for&nbsp;<a href="http://php.net/manual/en/book.mysqli.php" target="_blank">MySqli</a>.</p>

<h2><strong>Installation</strong></h2>

<p>Get code:</p>

<code>mkdir rest_api &amp;&amp; git clone&nbsp;https://github.com/DanilBaibak/rest_api.git rest_api</code>

<p>Then you need&nbsp;<a href="https://getcomposer.org/" target="_blank">Composer</a>. If you already have installed it, that&#39;s ok. If not, run command:</p>

<code>curl -sS https://getcomposer.org/installer | php</code>

<p>Install all source and necessary libraries:</p>

<code>php composer.phar install</code>

<p>Setup database:</p>

<code>Create new database. For start you can import tables from&nbsp;<strong>db_dump.sql</strong></code>

<p>Setup configuration file:</p>

<code>cp config/config.sample.php&nbsp;config/config.php</code>

<p>Open <strong>config/config.php</strong>. Add credentials of&nbsp;your database. Enter url which your API will be available as &#39;<strong>siteUrl</strong>&#39;. You&#39;ll need it for the testing.</p>

<p>Run phpunit tests:</p>

<code>vendor/phpunit/phpunit/phpunit</code>

<h2><strong>Usage</strong>&nbsp;</h2>

<p><strong>Resource (config/resources.php</strong><strong>): </strong>contains the rules for routing.&nbsp;Each action have to be describe with list of the rules.&nbsp;&#39;<strong>resource</strong>&#39; - url for access to the current action, &#39;<strong>method</strong>&#39; - method of the request, &#39;<strong>controller</strong>&#39; - name of the controller, &#39;<strong>action</strong>&#39; - name of the action. Please, look at the example:</p>

<div><code>&#39;resource&#39; &nbsp; =&gt; &#39;product/check_unique_value&#39;,</code></div>
<div><code>&#39;method&#39; &nbsp; &nbsp; =&gt; &#39;GET&#39;,</code></div>
<div><code>&#39;controller&#39; &nbsp;=&gt; &#39;ProductController&#39;,</code></div>
<div><code>&#39;action&#39; &nbsp; &nbsp; &nbsp; =&gt; &#39;checkUniqueProduct&#39;</code></div>

