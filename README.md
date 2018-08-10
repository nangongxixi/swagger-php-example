# swagger-php-example
基于swagger-php生成json来实现接口管理
<br><br>
>### 编写swagger文件

操作过程：
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;swagger会扫描vendor/bin目录下所有的.php文件，并把所有.php文件生成的json文件拼装成一个json文件。
然后再手动把这个json文件导入到Yapi中解析成可视化的接口列表即可。
<br><br>

>### 安装 和 生成 .json 文件

    # git clone https://github.com/nangongxixi/swagger-php-example.git
    # cd vendor/bin
    # swagger
    
以上操作后，即可在当前目录生成一个json文件…<br>
<br>
>### 代码示例：

     /**
      * @OAS\Schema(
      *   schema="photolist", type="object", required={"id"},
      *   @OAS\Property(property="id", format="int64", type="integer", description="自增id"),
      *   @OAS\Property(property="title", type="string", format="title", description="名称", default="华南金福"),     
      *   @OAS\Property(property="url", type="string", format="url", description="相册地址"),
      *   @OAS\Property(property="image", format="image", type="string", description="缩略图")
      * )
      */
     /**
     * @OAS\Get(path="photo.search", description="楼盘效果图搜索", tags={"接口样式示例"}, summary="相册搜索",
     *     @OAS\Parameter(name="page", in="query", description="分页参数", example=1, required=true,
     *         @OAS\Schema(type="integer", format="int32"),
     *     ),
     *     @OAS\Parameter(name="sk", in="query", description="搜索关键字", required=false,
     *         @OAS\Schema(type="string",format="title")
     *     ),
     *     @OAS\Response(response=200, description="状态码",
     *         @OAS\MediaType(mediaType="application/json",
     *             @OAS\Schema(type="object", required={"code", "data"},
     *                 @OAS\Property(property="code", type="integer", description="状态码"),
     *                 @OAS\Property(property="items", type="array", description="搜索结果集",
     *                    @OAS\Items(ref="#/components/schemas/photolist")
     *                 )
     *             ),
     *         )
     *     )
     * )
     */
<br>


>### 代码常规操作说明：<br>

OAS\Schema :  表示这是一个模型<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; schema：模型名称<br>
OAS\Get :  请求方式<br>
path :  接口地址<br>
description :  接口描述<br>
tags :  导入到Yapi后所生成的接口列表的名称<br>
summary :  把接口里面种的接口名称翻译成中文说明<br>
required :  必须 / 非必须<br><br>

type :  值的类型 （常用的四种[ array, int32, object, string ]）<br>
format :  格式化方式<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当 type=string 时，常用格式化方式有：<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;url=地址, image=图片地址, title=标题 (更多请参见Yapi编辑接口时的选项)<br><br>
OAS\Items :  所调用的模型的名称（在前面需预定义过该名称的模型）<br>
