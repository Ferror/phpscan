ci:
	./vendor/bin/phpunit tests --colors=always

metrics:
	./vendor/bin/phpmetrics --report-html=myreport.html src
