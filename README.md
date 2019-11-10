# Search Engine

Project uses scrapy to crawl data and stores in file in json formate. Scrapy project used here can be found in mycrawler directory. Indexer used here is solr version 7.3.1. 

### use

Create solr core if you don't have one using command  <br/><br/>
```$ bin/solr create -c <name>```
<br/><br/>


Clone the repo. Name of the spider is _extract_.
Nevigate to solr-7.3.1/mycrawler/crawler folder in terminal and type<br/><br/>
```$scrapy crawl NAME_OF_SCRAPY_SPIDER -o links.json```<br/><br/>
Here name of project is extract.<br/><br/>
```$scrapy crawl extract -o links.json```<br/><br/>

On executing this command spider will crawl and store all the url in links.json file.

<br/><br/>Then nevigate to solr-7.3.1.  We now have to do indexing.<br/><br/>
Type the following command in terminal.<br/><br/>
```$bin/post -c NAME_OF_SOLR_CORE mycrawler/crawler/l.json```

<br/><br/>

This will index the file l.json. 
Here core name is jcg.
<br/></br>

```$bin/post -c jcg mycrawler/crawler/l.json```

<br/><br/>
Start solr using by typing ```$bin/solr start ```.
Now, type http://localhost:8983/solr/# in your browser. Nevigate to jcg/query. Here jcg is solr core name.<br/>
If you want to see all result do not change anything and click execute query.
This will display indexed result as result.

### Reference 

Check resource for reference and frequent issues.
