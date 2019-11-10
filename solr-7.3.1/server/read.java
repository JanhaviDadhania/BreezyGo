import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.io.FileWriter;
import org.apache.lucene.index.DirectoryReader;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.IndexWriter;
import org.apache.lucene.index.IndexWriterConfig;
import org.apache.lucene.search.IndexSearcher;
import org.apache.lucene.search.Query;
import org.apache.lucene.search.ScoreDoc;
import org.apache.lucene.search.TopDocs;
import org.apache.lucene.store.Directory;
import org.apache.lucene.store.FSDirectory;
import org.apache.lucene.document.*;
import org.apache.lucene.document.Field.Store;

public class readIdSolr {
 private static void createFile(String file, ArrayList < String > arrData)
 throws IOException {
  FileWriter writer = new FileWriter(file + ".txt");
  int size = arrData.size();
  for (int i = 0; i < size; i++) {
   String str = arrData.get(i).toString();
   writer.write(str);
  }
  writer.close();
 }


 public static void main(String[] args) throws IOException {
  Path path = Paths.get(“solr/nutch/data/index"); //replace with path to the index file
   Directory dirIndex = FSDirectory.open(path); 
   IndexReader indexReader = DirectoryReader.open(dirIndex); 
   String id = "";
   ArrayList < String > docIds = new ArrayList < String > ();
   Document doc = null; 
   System.out.println("In--total--" + indexReader.numDocs()); 
   int cnt = 0;
   for (int i = 0; i < indexReader.numDocs(); i++) {
    cnt += 1;
    doc = indexReader.document(i);
    id = doc.get("id");
    docIds.add(id);
    if (cnt % 10000 == 0) {
     System.out.println("Current cnt " + cnt);
    }
   }
   createFile("MyDataFile", docIds); indexReader.close(); dirIndex.close();
  }
 }

