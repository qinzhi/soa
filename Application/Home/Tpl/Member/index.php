<layout name="Layout/col" />
<div data-role="page" id="member-list">
    <div data-role="header" data-position="fixed">
        <h1>企业通讯录</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">架构</a>
    </div><!-- /header -->

    <div role="main" class="ui-content ui-content-member">
        <ul data-role="listview" data-filter="true"
            data-icon="false" data-filter-placeholder="搜索79位联系人" data-inset="true">
            <?php foreach($members as $key=>$value):?>
                <li data-role="list-divider" id="{$key}">{$key}</li>
                <?php foreach($value as $member):?>
                    <li class="member">
                        <a href="#member_detail" data-transition="flow">
                            <img src="__IMAGE__/27891417049690.jpg"/>
                            <h2>{$member.name}</h2>
                            <p>php工程师</p>
                        </a>
                    </li>
                <?php endforeach;?>
            <?php endforeach;?>
        </ul>
    </div><!-- /content -->

    <div data-role="panel" data-display="push" id="nav-panel">
        <ul data-role="listview">
            <li data-node="1"><a href="#">所有成员</a></li>
            <volist name="depts" id="vo">
                <li data-node="{$vo.id}"><a href="#">{$vo.name}</a></li>
            </volist>
        </ul>

    </div><!-- /panel -->

    <div id="sorter">
        <ul data-role="listview">
            <li href="#A"><span>A</span></li>
            <li href="#B"><span>B</span></li>
            <li href="#C"><span>C</span></li>
            <li href="#D"><span>D</span></li>
            <li href="#E"><span>E</span></li>
            <li href="#F"><span>F</span></li>
            <li href="#G"><span>G</span></li>
            <li href="#H"><span>H</span></li>
            <li href="#I"><span>I</span></li>
            <li href="#J"><span>J</span></li>
            <li href="#K"><span>K</span></li>
            <li href="#L"><span>L</span></li>
            <li href="#M"><span>M</span></li>
            <li href="#N"><span>N</span></li>
            <li href="#O"><span>O</span></li>
            <li href="#P"><span>P</span></li>
            <li href="#Q"><span>Q</span></li>
            <li href="#R"><span>R</span></li>
            <li href="#S"><span>S</span></li>
            <li href="#T"><span>T</span></li>
            <li href="#U"><span>U</span></li>
            <li href="#V"><span>V</span></li>
            <li href="#W"><span>W</span></li>
            <li href="#X"><span>X</span></li>
            <li href="#Y"><span>Y</span></li>
            <li href="#Z"><span>Z</span></li>
        </ul>
    </div><!-- /sorter -->
</div>

<!-- Start of second page: #two -->
<div data-role="page" id="member_detail">

    <div data-role="header" data-position="fixed">
        <h1>企业通讯录</h1>
        <a href="#member-list" data-transition="flow" data-direction="reverse" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left ui-btn-icon-notext">Back</a>
    </div><!-- /header -->

    <div role="main" class="ui-content">
        <div class="ui-main-part">
            <img src="__IMAGE__/27891417049690.jpg"/>
            <ul class="ui-main-part_t">
                <li>
                    <span class="main-part-key">姓名:</span>
                    <span class="main-part-value main-part-name">秦智</span>
                </li>
                <li>
                    <span class="main-part-key">性别:</span>
                    <span class="main-part-value main-part-sex">男</span>
                </li>
                <li>
                    <span class="main-part-key">职位:</span>
                    <span class="main-part-value main-part-position">php工程师</span>
                </li>
                <li>
                    <span class="main-part-key">生日:</span>
                    <span class="main-part-value main-part-birthday">1991-02-06</span>
                </li>
            </ul>
            <ul class="ui-main-part_b">
                <li>
                    <span class="main-part-key">所在部门:</span>
                    <span class="main-part-value main-part-dept">技术部</span>
                </li>
                <li>
                    <span class="main-part-key">负责业务:</span>
                    <span class="main-part-value main-part-duty">项目开发</span>
                </li>
                <li>
                    <span class="main-part-key">居住地址:</span>
                    <span class="main-part-value main-part-site">新长海中心</span>
                </li>
            </ul>
        </div>
        <div class="ui-main-touch">
            <ul class="main-touch-list">
                <li>
                    <a href="tel:15874246906">
                        <span class="main-touch-value">15874246906</span>
                        <button class="ui-btn ui-icon-comment ui-shadow ui-corner-all ui-btn-icon-notext ui-btn-inline" onclick="javascript:location.href='sms:15874246906'">phone</button>
                    </a>
                </li>
                <li>
                    <a href="tel:15874246906">
                        <span class="main-touch-value">15874246906</span>
                        <button class="ui-btn ui-icon-comment ui-shadow ui-corner-all ui-btn-icon-notext ui-btn-inline" onclick="javascript:location.href='sms:15874246906'">phone</button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="main-touch-value">qz631248045</span>
                        <img class="ui-img" src="__IMAGE__/wx.png"/>
                    </a>
                </li>
                <li>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=631248045&site=oicqzone.com&menu=yes">
                        <span class="main-touch-value">631248045</span>
                        <img class="ui-img" src="__IMAGE__/qq.png"/>
                    </a>
                </li>
                <li>
                    <a href="Mailto:631248045@qq.com">
                        <span class="main-touch-value">631248045@qq.com</span>
                        <button class="ui-btn ui-icon-mail ui-shadow ui-corner-all ui-btn-icon-notext ui-btn-inline">phone</button>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- /content -->
</div><!-- /page two -->

<script>
    var soa = {
        _member_obj: null
    }
    if(window.applicationCache) {
        window.applicationCache.addEventListener('cached', function(){
            alert('cached');
        }, true);
    }
    $(function(){
        $('.member').click(function(){
            soa._member_obj = $(this);
        });
        $(this).on("pageinit",function(event){
            //$('#member_detail').find('div[data-role=header] h1').text(soa._member_obj.find('h2').text());
        });
    });

    //初始化声明
    var dbName = "soa"; //数据库名称
    var dbVersion = 2.0; //数据库版本
    var tablename = "member"; //表名

    var H5AppDB = {};

    //实例化IndexDB数据上下文，这边根据浏览器类型来做选择
    var indexedDB = window.indexedDB || window.webkitIndexedDB ||window.mozIndexedDB;

    if ('webkitIndexedDB' in window) {
        window.IDBTransaction = window.webkitIDBTransaction;
        window.IDBKeyRange = window.webkitIDBKeyRange;
    }

    H5AppDB.indexedDB = {};
    H5AppDB.indexedDB.db = null;

    //错误信息，打印日志
    H5AppDB.indexedDB.onerror = function (e) {
        console.debug(e);
    };

    /*
    *打开数据库,初始化数据库,并创建存储对象
    */
    H5AppDB.indexedDB.open = function () {

        //初始IndexDB
        var request = indexedDB.open(dbName, dbVersion);

        request.onsuccess = function (e) {
            // Old api: var v = "2-beta";
            log.debug("success to open DB: " + dbName);
            H5AppDB.indexedDB.db = e.target.result;
            var db = H5AppDB.indexedDB.db;
            if (db.setVersion) {
                console.log("in old setVersion: " + db.setVersion);
                if (db.version != dbVersion) {
                    var req = db.setVersion(dbVersion);
                    req.onsuccess = function () {
                        if (db.objectStoreNames.contains(tablename)) {
                            db.deleteObjectStore(tablename);
                        }
                        var store = db.createObjectStore(tablename, { keyPath: "timeStamp" });//keyPath：主键，唯一性

                        var trans = req.result;
                        trans.oncomplete = function (e) {
                            console.log("== trans oncomplete ==");
                            H5AppDB.indexedDB.getAllTodoItems();
                        }
                    };
                }
                else {
                    H5AppDB.indexedDB.getAllTodoItems();
                }
            }
            else {
                H5AppDB.indexedDB.getAllTodoItems();
            }
        }

        //如果版本不一致，执行版本升级的操作
        request.onupgradeneeded = function (e) {
            console.debug("going to upgrade our DB!");

            H5AppDB.indexedDB.db = e.target.result;
            var db = H5AppDB.indexedDB.db;
            if (db.objectStoreNames.contains(tablename)) {
                db.deleteObjectStore(tablename);
            }

            var store = db.createObjectStore(tablename, { keyPath: "timeStamp" });//NoSQL类型数据库中必须的主键，唯一性

            H5AppDB.indexedDB.getAllTodoItems();
        }

        request.onfailure = H5AppDB.indexedDB.onerror;
    };

    /*
    * 获取对象信息，并进行轮询读取，然后绑定到页面
    */
    H5AppDB.indexedDB.getAllTodoItems = function () {

        var todos = document.getElementById("todoItems");
        todos.innerHTML = "";



        var db = H5AppDB.indexedDB.db;
        var trans = db.transaction([tablename], "readwrite");//通过事物开启对象
        var store = trans.objectStore(tablename);//获取到对象的值

        // Get everything in the store;

        var keyRange = IDBKeyRange.lowerBound(0);
        var cursorRequest = store.openCursor(keyRange);//开启索引为0的表

        cursorRequest.onsuccess = function (e) {

            var result = e.target.result;

            if (!!result == false)
                return;

            renderTodo(result.value);
            result.continue();//这边执行轮询读取
        };

        cursorRequest.onerror = H5AppDB.indexedDB.onerror;
    };

    function renderTodo(row) {
        var todos = document.getElementById("todoItems");
        var li = document.createElement("li");
        var a = document.createElement("a");
        var t = document.createTextNode(row.text);

        a.addEventListener("click", function() {
            H5AppDB.indexedDB.deleteTodo(row.timeStamp);
        }, false);

        a.textContent = " [Delete]";
        li.appendChild(t);
        li.appendChild(a);
        todos.appendChild(li);
    };

    /*
     *添加数据对象
     */
    H5AppDB.indexedDB.addTodo = function (todoText) {
        var db = H5AppDB.indexedDB.db;
        var trans = db.transaction([tablename], "readwrite");
        var store = trans.objectStore(tablename);

        var newArray = new Array("wzh","374532");

        //数据以对象形式保存，体现NoSQL类型数据库的灵活性
        var data = {
            "text": todoText,
            "timeStamp": new Date().getTime(),
            "obj":newArray
        };

        var request = store.put(data);//保存数据

        request.onsuccess = function (e) {
            H5AppDB.indexedDB.getAllTodoItems();
        };

        request.onerror = function (e) {
            log.debug("Error Adding: ", e);
        };
    };
    function addTodo() {
        var todo = document.getElementById("todo");
        H5AppDB.indexedDB.addTodo(todo.value);
        todo.value = "";
    }

    /**
     * 删除数据对象（根据主键删除）
     * @param id
     */
    H5AppDB.indexedDB.deleteTodo = function(id) {
        var db = H5AppDB.indexedDB.db;
        var trans = db.transaction([tablename], "readwrite");
        var store = trans.objectStore(tablename);

        var request = store.delete(id);//根据主键来删除

        request.onsuccess = function(e) {

            H5AppDB.indexedDB.getAllTodoItems();
            alert("删除成功");
        };

        request.onerror = function(e) {
            log.debug("Error Adding: ", e);
        };
    };
</script>