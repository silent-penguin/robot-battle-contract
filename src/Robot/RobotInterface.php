<?php

declare(strict_types=1);

namespace RB\Contract\Robot;

use RB\Contract\Action\ActionInterface;
use RB\Contract\BattleInfo;
use RB\Contract\Context;

/**
 * The main interface of the robot.
 *
 * In the implementation, you are allowed to use local memory for one battle.
 *
 * Requirements:
 * 1. You cannot use the functions:
 *    - exec,
 *    - system,
 *    - shell_exec,
 *    - passthru,
 *    - popen,
 *    - proc_open,
 *    - eval,
 *    - assert,
 *    - pcntl_exec,
 *    - file_put_contents,
 *    - file_get_contents,
 *    - fopen,
 *    - unlink,
 *    - rename,
 *    - mkdir,
 *    - rmdir,
 *    - fsockopen,
 *    - pfsockopen,
 *    - socket_create,
 *    - socket_connect,
 *    - curl_init,
 *    - curl_exec,
 *    - curl_multi_exec,
 *    - stream_socket_client,
 *    - stream_socket_server,
 *    - http_get,
 *    - http_post,
 *    - http_request,
 *    - dns_get_record,
 *    - gethostbyname,
 *    - gethostbynamel,
 *    - class_exists.
 * 2. You cannot use third-party libraries.
 * 3. You cannot use network functions or make requests.
 * 4. Your implementation must contain only one file with one class implementing this interface.
 * 5. The Constructor must not have any dependencies.
 */
interface RobotInterface
{
    /**
     * This function will be called before the battle begins.
     * BattleInfo contains general information about the map and its restrictions.
     */
    public function onBattleStart(BattleInfo $battleInfo): void;

    /**
     * Called each turn.
     * Write in this method the logic of your robots depending on the Context.
     */
    public function step(Context $context): ActionInterface;
}
