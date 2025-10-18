<?php

declare(strict_types=1);

namespace Zeus;

use Zeus\Exception\FacadeErrorException;
use Zeus\Exception\ClassNotFoundException;

/**
 * Facade 的简单实现
 *
 * @author imxieke <oss@live.hk>
 * @copyright (c) 2024 CloudFlying
 * @date 2024-07-01
 */
abstract class Facade
{
    protected static $instances = [];

    /**
     * 创建 Facade 实例
     *
     * @return object
     */
    public static function make()
    {
        $class = static::bind();
        if (!class_exists($class)) {
            throw new ClassNotFoundException("Class {$class} Not Found");
        }
        if (!isset(static::$instances[$class])) {
            static::$instances[$class] = new $class();
        }
        return static::$instances[$class];
    }

    /**
     * 必需要实现的方法 内容仅需返回类的字符串即可
     *
     * return Zeus\Config;
     * return \Zeus\Config;
     *
     * @throws FacadeErrorException
     * @return string
     * @author imxieke <oss@live.hk>
     * @date 2024-07-01 23:12:20 Monday
     */
    public static function bind()
    {
        throw new FacadeErrorException("Facade bind() method not implements");
    }

    /**
     * 动态调用
     *
     * @param mixed $method
     * @param mixed $args
     * @author imxieke <oss@live.hk>
     * @date 2025/07/30 09:34:38
     */
    public function __call($method, $args)
    {
        return call_user_func_array([static::make(), $method], $args);
    }

    /**
     * 静态调用
     *
     * @param mixed $method
     * @param mixed $args
     * @author imxieke <oss@live.hk>
     * @date 2025/07/30 09:34:24
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::make();
        return $instance->$method(...$args);
    }
}
