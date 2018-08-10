<?php

/**
 * @OAS\Schema(
 *   schema="photolist", type="object", required={"id"},
 *   @OAS\Property(property="id", format="int64", type="integer", description="自增id"),
 *   @OAS\Property(property="title", type="string", format="title", description="名称", default="华南金福"),
 *   @OAS\Property(property="name", type="string", format="title", description="名称", default="华南金福"),
 *   @OAS\Property(property="hits", type="integer", description="点击次数", default="254"),
 *   @OAS\Property(property="url", type="string", format="url", description="相册地址"),
 *   @OAS\Property(property="image", format="image", type="string", description="缩略图"),
 *   @OAS\Property(property="image_albums_226x176",format="image", type="string", description="指定尺寸缩略图"),
 *   @OAS\Property(property="collection", type="integer", description="收藏数", default="45"),
 *   @OAS\Property(property="share", type="integer", description="分享数量", default="72"),
 *   @OAS\Property(property="aid", type="integer", description="相册集id", default="83")
 * )
 */


/**
 * @OAS\Schema(
 *   schema="photoinfo", type="object", required={"id"},
 *   @OAS\Property(property="id", format="int64", type="integer", description="自增id"),
 *   @OAS\Property(property="imgmid", type="integer", description="图片guid"),
 *   @OAS\Property(property="title", type="string", format="title", description="图片名称"),
 *   @OAS\Property(property="content", type="integer", description="图片内容"),
 *   @OAS\Property(property="image", type="string", format="image", description="缩略图"),
 *   @OAS\Property(property="cid", type="integer", description="所属类别"),
 *   @OAS\Property(property="murl", type="string", format="url", description="相册集地址"),
 *   @OAS\Property(property="images", type="array", description="详情图片列表",
 *                    @OAS\Items(ref="#/components/schemas/photoimages")
 *                 )
 * )
 */

/**
 * @OAS\Schema(schema="photoimages", type="object", required={"id"},
 *   @OAS\Property(property="img", type="image", description="图片地址")
 * )
 */

/**
 * @OAS\Get(path="photo.search", description="楼盘效果图搜索", tags={"接口样式示例"}, summary="相册搜索",
 *     @OAS\Parameter(name="page", in="query", description="分页参数", example=1, required=true,
 *         @OAS\Schema(type="integer", format="int32"),
 *     ),
 *     @OAS\Parameter(name="style", in="query", description="风格类别id", required=false,
 *         @OAS\Schema(type="integer",format="int32")
 *     ),
 *     @OAS\Parameter(name="area", in="query", description="面积id", required=false,
 *         @OAS\Schema(type="integer",format="int32")
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


/**
 * @OAS\Get(
 *     path="photo.info",
 *     description="效果图详情", operationId="findPets" , tags={"接口样式示例"}, summary="相册详情",
 *     @OAS\Parameter(
 *         name="id", in="query", description="效果图id", required=true, style="form",
 *         @OAS\Schema(type="integer", format="int32"),
 *     ),
 *     @OAS\Response(
 *         response=200, description="pet response",
 *         @OAS\MediaType(
 *             mediaType="application/json",
 *             @OAS\Schema(ref="#/components/schemas/photoinfo")
 *         )
 *     )
 * )
 */

/**
 * @OAS\Get(
 *     path="photo.navList",
 *     description="效果图分类列表", operationId="findPets", tags={"接口样式示例"}, summary="相册列表",
 *     @OAS\Response(
 *         response=200, description="pet response",
 *         @OAS\MediaType(
 *             mediaType="application/json",
 *             @OAS\Schema(ref="#/components/schemas/designnavlist")
 *         )
 *     )
 * )
 */